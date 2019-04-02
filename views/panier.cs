using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Makhla
{
    #region Panier
    public class Panier
    {
        #region Member Variables
        protected int _id_produit;
        protected string _image;
        protected unknown _prix;
        protected int _quantite;
        protected string _couleur;
        #endregion
        #region Constructors
        public Panier() { }
        public Panier(string image, unknown prix, int quantite, string couleur)
        {
            this._image=image;
            this._prix=prix;
            this._quantite=quantite;
            this._couleur=couleur;
        }
        #endregion
        #region Public Properties
        public virtual int Id_produit
        {
            get {return _id_produit;}
            set {_id_produit=value;}
        }
        public virtual string Image
        {
            get {return _image;}
            set {_image=value;}
        }
        public virtual unknown Prix
        {
            get {return _prix;}
            set {_prix=value;}
        }
        public virtual int Quantite
        {
            get {return _quantite;}
            set {_quantite=value;}
        }
        public virtual string Couleur
        {
            get {return _couleur;}
            set {_couleur=value;}
        }
        #endregion
    }
    #endregion
}