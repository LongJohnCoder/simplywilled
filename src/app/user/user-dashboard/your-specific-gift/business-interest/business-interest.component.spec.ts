import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BusinessInterestComponent } from './business-interest.component';

describe('BusinessInterestComponent', () => {
  let component: BusinessInterestComponent;
  let fixture: ComponentFixture<BusinessInterestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BusinessInterestComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BusinessInterestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
